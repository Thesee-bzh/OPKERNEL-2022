# Web / SQL Project1

## Challenge (100 points)
L'auteur d'un blog de sécurité informatique affirme que son site est parmi les plus sécurisés de tous et donc impénétrable. Ça ne coûte rien de vérifier une telle affirmation...

Bien commencer: L'une des attaques les plus répandues sur les formulaires d'authentification en ligne reste l'injection SQL. Elle permet d'accéder à un grand nombre d'informations.

Vous devez essayer de vous connecter sur le compte admin du site en contournant la sécurité.

## Inputs
- server: secureblog.challenge.operation-kernel.fr

## Solution
There's a login form at `https://secureblog.challenge.operation-kernel.fr/v1/login.php` with a very basic `SQL injection` we can exploit by entering `admin'-- -` as login and anything as password.

We get granted with the message:
> Welcome Admin !
> Vous pouvez valider le challenge avec le mot de passe de l'administrateur ;)
> HACK{B3_C4r3FuL_W1th_AUthentiC4tION}
`

## Flag
HACK{B3_C4r3FuL_W1th_AUthentiC4tION}