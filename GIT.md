# Guide Git

## Les branches

ATTENTION: toutes les commandes à exécuter dans le terminal peuvent être execute depuis l'interface graphique du client git (GitHub Desktop, SourceTree etc).

- Deux branches on été créées, <b>master</b> et <b>dev</b>.
- Les commits sont faits sur le branche <b>dev</b>, et quand le site sera stable, la branche <b>dev</b> sera fusionnée (merged) avec la branche <b>master</b>.
- Lorsque vous êtes dans votre dossier de code (git repository), exécuter dans le terminal <i>"git checkout dev"</i> pour changer de branche.
- <i>"git branch"</i> pour connaitre votre branche actuelle.

## Etapes de développement à suivre

- Lorsque vous commencez, il faut récupérer les modifications qui ont pu être faites sur le git depuis votre dernier <i>"git push"</i>, exécuter <i>"git pull"</i>
- Ecrivez votre code dans le repertoire git.
- Si vos modifications incluent des nouveaux fichiers, il faut les faire suivre par le repertoire git, exécuter <i>"git add ."</i> pour tous les ajouter ou <i>"git add fichier1 fichier2..."</i>
- Il faut ensuite enregistrer vos modifications, exécuter <i>"git commit . -m 'message d'information'"</i> pour tout enregistrer ou <i>"git commit fichier1 fichier2... -m 'message d'information'"</i>
- Enfin, il faut envoyer vos commits vers le serveur, exécuter <i>"git push origin nom_de_la_branche"</i>devollepement
