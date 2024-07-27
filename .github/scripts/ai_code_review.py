import os
import openai
import requests

# Configurar a chave de API da OpenAI
openai.api_key = os.getenv("OPENAI_API_KEY")

# Função para obter mudanças no código
def get_code_changes():
    # Este exemplo supõe que você está utilizando git diff para obter mudanças.
    # Dependendo do seu setup, você pode precisar ajustar isto.
    changes = os.popen("git diff origin/main..HEAD").read()
    return changes

# Função para solicitar a análise da IA
def review_code(changes):
    response = openai.Completion.create(
      model="text-davinci-003",
      prompt=f"Revise o seguinte código e sugira melhorias baseadas em clean code:\n\n{changes}",
      max_tokens=500
    )
    return response.choices[0].text.strip()

# Função para adicionar comentário no pull request
def post_comment_to_pr(comment):
    repo = os.getenv("GITHUB_REPOSITORY")
    pr_number = os.getenv("GITHUB_REF").split('/')[-1]
    token = os.getenv("GITHUB_TOKEN")
    
    url = f"https://api.github.com/repos/{repo}/issues/{pr_number}/comments"
    headers = {
        "Authorization": f"token {token}",
        "Accept": "application/vnd.github.v3+json"
    }
    data = {
        "body": comment
    }

    response = requests.post(url, json=data, headers=headers)
    if response.status_code != 201:
        raise Exception(f"Falha ao criar comentário: {response.status_code}, {response.text}")

# Obtendo mudanças no código
changes = get_code_changes()

if changes:
    # Realizando a revisão do código
    review = review_code(changes)
    print(f"Revisão de Código:\n\n{review}")
    
    # Postando comentário no pull request
    post_comment_to_pr(f"Revisão de Código por IA:\n\n{review}")
else:
    print("Nenhuma mudança no código detectada.")