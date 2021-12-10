# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Skins

A partir da versão 2, o laravel-usp-theme pode ser personalizado por meio de skins. O skin permite personalizar a aparência do sistema.

Um skin pode, por exemplo, trocar o logo da USP pelo logo da Unidade ou trocar a cor da faixa de login.

Para usar um skin, coloque no .env da sua aplicação a varável:

    USP_THEME_SKIN = nome_do_skin

Você também pode definir o skin no seu controller ou em outra parte do sistema com:

```php
    \UspTheme::setSkin('nome-do-skin');
```

O skin pode ser setado uma única vez e será persistido na sessão. Então pode-se criar uma rota para que o usuário troque a skin da aplicação.

Geralmente o nome do skin é a sigla da unidade, mas pode ser qualquer string. Uma unidade pode ter uma skin chamada 'EESC' e outra skin chamada 'EESC65Anos'.

### Criando um skin

Para criar um skin você deve alterar o projeto laravel-usp-theme. Crie uma issue, faça fork/clone do projeto, altere e faça um pull request.

Vamos supor que você vai criar um skin de nome **USP**. Dentro do projeto localize a pasta resources/view/partials/skins. Nessa pasta, utilize como modelo o skin **uspdev**: crie a pasta **usp** e copie o conteúdo da pasta **uspdev** para ela. Os arquivos que foram copiados podem ser alterados para refletir a aparência desejada.

Os assets que forem utilizados na skin devem ser colocados em pasta própria também. Localize a pasta resources/assets/skins. Crie a pasta **USP** referente ao skin e coloque todos os assets necessários.

Depois de mergear sua skin no laravel-usp-theme você deve atualizar o composer da sua aplicação para poder usar o novo skin.

**Nome da pasta do skin**: o nome da pasta deve ser sempre em minúsculo. Ao setar o USP_THEME_SKIN no .env você pode usar qualquer combinação de maiusculas e minúsculas pois, ao buscar a pasta, a variável é convertida para minúsculas.

**Sistemas existentes**: se você já usa o theme e quer implementar o skin, lembre de ajustar o config/laravel-usp-theme.php para refletir as novas configurações da versão 2 do tema.
