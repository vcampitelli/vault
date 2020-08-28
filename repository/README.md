Esse é um repositório de exemplo que possui um script PHP que lê as
variáveis de ambiente exportadas no `.env` e imprime-as na tela.

O arquivo `.gitlab-ci.yml` é o responsável por configurar o CI do
GitLab, utilizando algumas variáveis de ambiente para fazer um
simples deploy via SSH. Em um ambiente real, provavelmente você
deve estar utilizando outro meio de deploy, através do
kubernetes, por exemplo.
