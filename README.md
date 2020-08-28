# Protegendo suas variáveis sensíveis no deploy
Slides e scripts utilizados em minha palestra.

## Descrição
Você faz ideia de quantas senhas, credenciais e outros dados sigilosos estão configurados nas variáveis de ambiente de seu sistema de CD?

Já imaginou o que aconteceria se alguma conta de serviço fosse comprometida e você precisasse alterar os valores em todos seus repositórios?

Ao invés desse trabalho manual, irei mostrar uma abordagem criando um serviço de vault para centralizar suas credenciais e um plugin para consultar essas informações no momento do deploy, utilizando o GitLab como demonstração.

## Estrutura
```
.
├── api
├── client
├── repository
└── slides
```

1. A pasta `api` possui um Serviço de Vault bem simples criado em PHP. Ele apenas lê os dados presentes em `api/var/database.json`.
2. A pasta `client` possui um cliente em python que acessa o Vault acima. Esse script deve ser invocado pelo seu sistema de CI/CD.
3. A pasta `repository` é um repositório de exemplo feito em PHP que lê e imprime as variáveis de ambiente.
4. A pasta `slides` possui os slides da palestra.

## :warning: Atenção!
Não utilize esses scripts em ambientes produtivos. Eles foram criados apenas com caráter informativo.

A API não possui um sistema de autenticação e autorização.
