# Tema do Laravel para projetos USPdev

## [Início](../README.md) > Issues

O menu de outros sistemas pode não aparecer ao usar o servidor embutido do php com artisan. Isso está relacionado com o config:cache / config:clear.

Por outro lado usando servidor nginx ou apache deve funcionar corretamente.

```
php artisan optimize:clear
```