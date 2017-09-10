# Documentation

## Configuration

### Database

1. Copy the file `app/configuration/config.yml.dist` into `app/configuration/config.yml`
2. Enter your database credentials


### Send email with GMail SMTP server

Fill in the Swiftmailer section of `app/configuration/config.yml` with your GMail's credentials.

### Twig

Twig is used as Template.

If you need to use the `dump()` function provided by Twig. It is necessary to set debug to `true` on the config file:
`app/configuration/config.yml`
