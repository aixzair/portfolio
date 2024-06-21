-- ensembles

-- projets

INSERT INTO projets (pro_titre, pro_date_debut, pro_date_fin, pro_presentation, pro_image)
VALUES ('P''tit cuisto',
        str_to_date('2023-01-01', '%Y-%m-%d'),
        str_to_date('2023-02-01', '%Y-%m-%d'),
        'Un projet universitaire, réalisé par moi ainsi que 3 autres collègues. Il s''inspire du site Marmiton où l''on peut partager des recettes de cuisine et poster des commentaires.',
        'oui'),
       ('Pomodoro',
        str_to_date('2023-01-01', '%Y-%m-%d'),
        str_to_date('2023-07-01', '%Y-%m-%d'),
        'J''ai réalisé un pomodoro permettant de gérer votre temps de travail et de pause, afin de travailler plus efficacement.',
        'oui'),
       ('Gobblet Gobblers (Langage C)',
        str_to_date('2022-01-01', '%Y-%m-%d'),
        str_to_date('2022-04-01', '%Y-%m-%d'),
        'Cette première version est une application console développée par une équipe de 2 en langage C lors d''un projet universitaire en première année de BUT informatique.',
        'oui'),
       ('Gobblet Gobblers Web',
        str_to_date('2023-01-01', '%Y-%m-%d'),
        str_to_date('2023-02-01', '%Y-%m-%d'),
        'J''ai par la suite décidé de recommencer ce projet en le faisant en JavaScript en utilisant HTML et CSS pour l''interface utilisateur.',
        'oui'),
       ('Instant Weather',
        str_to_date('2023-01-01', '%Y-%m-%d'),
        str_to_date('2023-01-01', '%Y-%m-%d'),
        'C''est une application web pour connaître la météo des 7 prochains jours dans une ville sélectionnée. Je l''ai développée au sein d''une équipe de 4 personnes et j''ai utilisé des API.',
        'oui');

-- liens

-- apercus

-- point_travailles

/*
 %Y : Année (4 chiffres)
%y : Année (2 chiffres)
%m : Mois (01 à 12)
%d : Jour du mois (01 à 31)
%H : Heure (00 à 23 pour format 24 heures)
%h : Heure (01 à 12 pour format 12 heures)
%i : Minute (00 à 59)
%s : Seconde (00 à 59)
%p : AM ou PM (pour le format 12 heures)
 */