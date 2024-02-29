<div align="center">
<img src="public/Ola.png" width="900px" alt="Ola" />
</div>

## API MAXIMIZE NEWS

O MAXIMIZE NEWS é uma aplicação baseada em uma API que integra-se ao banco de dados PostgreSQL. Foi desenvolvida para manter os usuários atualizados com o que acontece no Brasil e no mundo. Além disso, oferece funcionalidades como cadastro de notícias, diretamente pelo Thunder Client ou Insomnia, além da listagem das notícias em card e a sua visualização completa.

## 💻 TECNOLOGIAS UTILIZADAS 

Projeto foi desenvolvido utilizando as seguintes tecnologias:

- Linguagem PHP com o framework Laravel na versão 10.
- Banco de dados PostgreSQL.
- Versionamento utilizando GitHub.
- Biblioteca Axios para fazer requisições HTTP, pois oferece uma sintaxe mais simples e possui um sistema mais robusto para lidar com os erros.

## 🔣 ARQUITETURA DO PROJETO

O projeto foi organizado em uma estrutura de pastas, visando aprimorar o controle, a implementação e a manutenção do código.

## ▶️ COMO EXECUTAR O PROJETO

- Clonar o repositório https://github.com/EduardoPSRodrigues/Maximize-BackEnd

- Criar uma base de dados no PostgreSQL com o nome **api_maximize**.

- Depois de clonar o repositório, abra o projeto e no terminal execute o comando:

```
composer install
```

- Abra o arquivo .env na raiz do projeto e configure os seguintes parâmetros:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=api_maximize
DB_USERNAME=admin
DB_PASSWORD=admin
```

- Para deixar a API online, basta executar o comando:

```
php artisan serve
```

### OBSERVAÇÕES

- Depois de fazer todos os passos acima, caso esteja utilizando o programa Docker com o DBeaver para acessar o banco de dados, basta abrir o PowerShell como administrador e executar o seguinte comando no terminal:

```
docker run --name maximize -e POSTGRESQL_USERNAME=admin -e POSTGRESQL_PASSWORD=admin -e POSTGRESQL_DATABASE=api_maximize -p 5432:5432 bitnami/postgresql
```

- Com o Docker sendo executado e o DBeaver configurado, abra o projeto e digite o comando:
  
```
php artisan migrate
```


## ✳️ DEMONSTRAÇÃO DA API 

#### Listagem das matérias - Rota Pública

À medida que o usuário realiza o cadastro de novas notícias, o sistema atualiza o página no Front End.

```http
  GET http://127.0.0.1:8000/api/listnews
```

JSON Response
```http
[{
		"id": 1,
		"titulo": "Evento especial marcado para o próximo mês",
		"descricao": "Participe do evento exclusivo que irá acontecer em breve",
		"data_de_publicacao": "2024-01-20",
		"imagem": "https:\/\/example.com\/imagem-evento.jpg"
	},
	{
		"id": 2,
		"titulo": "Notícia sobre o lançamento de um novo produto",
		"descricao": "Saiba mais sobre o novo produto que está revolucionando o mercado",
		"data_de_publicacao": "2023-12-15",
		"imagem": "https:\/\/example.com\/imagem-noticia.jpg"
	},
	{
		"id": 3,
		"titulo": "Nova pesquisa revela dados importantes sobre o mercado",
		"descricao": "Confira os resultados da pesquisa recente sobre as tendências de mercado",
		"data_de_publicacao": "2023-11-28",
		"imagem": "https:\/\/example.com\/imagem-pesquisa.jpg"
	}
]
```
##
#### Listagem da matéria completa - Rota Pública

Quando o usuário clicar em um card a API retorna todos os dados daquela matéria.

```http
  GET http://127.0.0.1:8000/api/listnews/4
```

JSON Response
```http
{
	"id": 4,
	"titulo": "Evento especial marcado para o próximo mês",
	"descricao": "Participe do evento exclusivo que irá acontecer em breve",
	"texto_completo": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt nisi quis libero ultricies, ac rutrum mauris lobortis. Nullam commodo libero eu erat feugiat, vitae rhoncus nisl tincidunt. Sed auctor nunc nec nunc consequat, vitae sodales urna aliquet. Sed consectetur dapibus quam, sed pharetra urna efficitur vel. Nam a dui at ligula eleifend convallis nec vel augue. Nullam tempus felis sit amet eros tincidunt, nec cursus urna consectetur. Proin non metus purus. Vivamus suscipit dui et ex consectetur fermentum.",
	"imagem": "https:\/\/example.com\/imagem-evento.jpg",
	"data_de_publicacao": "2024-01-20"
}
```

##
#### Cadastrar uma notícia - Rota Pública

```http
  POST http://127.0.0.1:8000/api/listnews
```

| Parâmetro  | Tipo      | Descrição                          |
| ---------- | --------- | ---------------------------------- |
| titulo | string | Título é obrigatório e máximo: 255 caracteres. |
| descricao | string | Descrição é obrigatória e máximo: 255 caracteres. |
| texto_completo | text | Texto é obrigatório.  |
| imagem | text | A imagem é obrigatória. |
| data_de_publicacao | date_format:Y-m-d | Formato: 2024-02-29 e obrigatório. |

JSON Content
```http
{
  "titulo": "F1: drone segue carro da RBR em Silverstone a mais de 300 km/h",
  "descricao": "Modelo feito sob medida acompanhou RB20, carro da equipe para a F1 2024, em volta pelo traçado britânico; Verstappen se espantou com velocidade do drone",
	"data_de_publicacao": "2024-02-27",
	"imagem": "https:\/\/example.com\/imagem-evento.jpg",
	"texto_completo": "É comum ver imagens aéreas em transmissões da F1, mas... Quantas vezes você já viu um drone competir com um carro? A RBR lançou o desafio e colocou um drone FPV (de visão em primeira pessoa) feito sob medida para seguir e acompanhar o ritmo do RB20, guiado por Max Verstappen, no circuito de Silverstone - e tudo isso a mais de 300 km/h, com velocidade máxima de 350 km/h. Esse tipo de filmagem nunca foi feito antes, e a qualidade é muito boa. Uau. Você também tem que tomar cuidado com as pontes. Uma loucura. Nunca pensei em ver um drone tão rápido. Dá uma perspectiva diferente para assistir à F1 - disse Verstappen. A ideia é fruto da parceria entre a equipe de energéticos e Ralph Hogenbirk, mais conhecido como Shaggy. O time austríaco fez contato com o criador há cerca de 1 ano. A principal preocupação das partes não era a velocidade, mas sim o desempenho nas curvas, permitindo que o drone seguisse um carro de F1 sem grandes problemas." 
  }
```

| Response Status       | Descrição                           |
|  :---: | ---------------------------------- |
|  201 | Notícia criada com sucesso |
|  400 | Falha ao cadastrar.|


##
#### Desafio da Maximize - BackEnd Challenge

|    Autor    |  Linkedin   |   WhatsApp  |
|  :---: | :---:  | :---: |
|  <img src="https://avatars.githubusercontent.com/u/135388215?s=400&u=a37d71f559365352e60211d8f88e41516c7e2e7d&v=4" width="60%" height="60%" alt="Foto do Autor Eduardo Rodrigues" /> | [Eduardo Rodrigues](https://www.linkedin.com/in/eduardo-rodrigues-a1a0792a4/) | +55 (24) 99991-9295 |



