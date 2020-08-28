# Protegendo suas variáveis sensíveis no deploy

## Problemática
A 3a regra do [12 Factor App](https://12factor.net/) é sobre [armazenar configurações em variáveis de ambiente](https://12factor.net/config), e podemos fazer isso em diversos sistemas de CI/CD, como GitLab e GitHub.

Lá devemos guardar, por exemplo, algumas informações sensíveis, como usuário e senha para conexão com o banco de dados, credenciais de acesso a serviços (por exemplo APIs).

Olhando do ponto de vista de arquitetura de sistemas, isso é ótimo: estamos isolando as configurações que geralmente variam de acordo com o ambiente (desenvolvimento, homologação, produção, etc) nessas variáveis.

Entretanto, sob a ótica de segurança da informação, temos um problema para a área de governança, já que as credenciais ficam espalhadas sem muito controle, o que dificulta - e muito - a gestão, manutenção e renovação desses acessos.

SSDLC: https://dzone.com/articles/ssdlc-101-what-is-the-secure-software-development

## Proposta de solução
Podemos isolar essas informações sensíveis em um serviço externo e, no momento de deploy, consultamos a API e injetamos como variáveis de ambiente em tempo de execução.

Isso é conhecido como cofre de credenciais _(também é visto como cofre de senhas, mas prefiro o termo mais genérico pois podemos armazenar qualquer tipo de dado de acesso)_.

### Exemplo de implementação
1. Instalação de um ambiente de GitLab
2. Criação de um repositório de exemplo que lê as variáveis de um arquivo `.env` e imprime na tela
3. Configuração do CI/CD do GitLab para publicar o repositório acima em um servidor
4. Criação de um serviço de cofre
5. Desenvolvimento de um script invocado no CI/CD para consultar o serviço de cofre e injetar as variáveis de ambiente
