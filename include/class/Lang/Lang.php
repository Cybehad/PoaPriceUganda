<?php


namespace Lang;


class Lang
{
    public function __construct()
    {
    }

    protected $LANGUAGE = array(
        'GANDA' => [
            'LOGIN' => 'Login',
            'LOGOUT' => 'Logout',
            'BACK' => 'Mabega',
            'FORWARD' => 'Maaso',
            'CANCEL' => 'Sazaamu',
            'NEXT' => 'Maaso',
            'PREVIOUS' => 'Mabega',
            'APP_FAILED' => 'App failed!'
        ],
        'SWAHILI' => [
            'LOGIN' => 'Ingia',
            'LOGOUT' => 'Kuondoka',
            'BACK' => 'Nyuma',
            'FORWARD' => 'Mbele',
            'CANCEL' => 'Ghafu',
            'NEXT' => 'Ijayo',
            'PREVIOUS' => 'Kuntagulia',
            'APP_FAILED' => 'App failed!'
        ],
        'ENG' => [
            'LOGIN' => 'Login',
            'LOGOUT' => 'Logout',
            'BACK' => 'Back',
            'FORWARD' => 'Forward',
            'CANCEL' => 'Cancel',
            'NEXT' => 'Next',
            'PREVIOUS' => 'Previous',
            'APP_FAILED' => 'App failed!'
        ],
        'FRENCH' => [
            'LOGIN' => 'Connexion',
            'LOGOUT' => 'Se déconnecter',
            'BACK' => 'Dos',
            'FORWARD' => 'Avant',
            'CANCEL' => 'Annuler',
            'NEXT' => 'Suivant',
            'PREVIOUS' => 'Précédent',
            'APP_FAILED' => 'L\'application a échoué !'
        ],
    );
    protected $MESSAGES = array(
        'GANDA' => [
            'LOGOUT_SUCCESSFUL' => 'You are successfully logged out.',
            'LOGOUT_FAILURE' => 'You\'re not logged in.',
        ],
        'SWAHILI' => [
            'LOGOUT_SUCCESSFUL' => 'Umefanikiwa kutoka nje.',
            'LOGOUT_FAILURE' => 'Hujaingia.',
        ],
        'ENG' => [
            'LOGOUT_SUCCESSFUL' => 'You are successfully logged out.',
            'LOGOUT_FAILURE' => 'You\'re not logged in.',
        ],
        'FRENCH' => [
            'LOGOUT_SUCCESSFUL' => 'Vous êtes déconnecté avec succès.',
            'LOGOUT_FAILURE' => 'Vous n\'êtes pas connecté.',
        ],
    );
    protected $ERRORS = array(
        'GANDA' => [
            'INVALID_ACTION' => 'Ekikolwa kikyamu ekikoledwa!',
            'INVALID_PASSWORD' => 'Password jotademu nffu, gezaako neera!',
            'INVALID_USERNAME' => 'Erinya lyotademu ffu, gezaako neera!',
            'UNAUTHORIZED_ACCESS' => 'Unauthorized access.',
            'MISSING' => 'Missing or invalid.',
            'EXCESS_LOGIN' => 'You have attempted to login too many times!',
            'MISSING_CODE' => 'No error message found',
        ],
        'SWAHILI' => [
            'INVALID_ACTION' => 'Kitendo Batili Kimefanywa!',
            'INVALID_PASSWORD' => 'Nenosiri batili limeingizwa!',
            'INVALID_USERNAME' => 'Jina la mtumiaji si sahihi limeingia!',
            'UNAUTHORIZED_ACCESS' => 'Ufikiaji usioidhinishwa.',
            'MISSING' => 'Kukosa au batili.',
            'EXCESS_LOGIN' => 'Umejaribu kuingia mara nyingi sana!',
            'MISSING_CODE' => 'Hakuna ujumbe wa hitilafu uliopatikana',
        ],
        'ENG' => [
            'INVALID_ACTION' => 'Invalid Action Done!',
            'INVALID_PASSWORD' => 'Invalid Password Entered!',
            'INVALID_USERNAME' => 'Invalid Username entered!',
            'UNAUTHORIZED_ACCESS' => 'Unauthorized access.',
            'MISSING' => 'Missing or invalid.',
            'EXCESS_LOGIN' => 'You have attempted to login too many times!',
            'MISSING_CODE' => 'No error message found',
        ],
        'FRENCH' => [
            'INVALID_ACTION' => 'Action non valide effectuée',
            'INVALID_PASSWORD' => 'Mot de passe entré non valide!',
            'INVALID_USERNAME' => 'Nom d\'utilisateur entré invalide!',
            'UNAUTHORIZED_ACCESS' => 'L\'accès non autorisé.',
            'MISSING' => 'Manquant ou invalide.',
            'EXCESS_LOGIN' => 'Vous avez tenté de vous connecter trop de fois!',
            'MISSING_CODE' => 'Aucun message d\'erreur trouvé',
        ],
    );

    public function language($type, $lang, $purpose)
    {
        echo $this->ERRORS['ENG']['INVALID_PASSWORD'];
        if (isset($type) && isset($lang) && isset($purpose)) {
            $type = strtoupper($type);
            $lang = strtoupper($lang);
            $purpose = strtoupper($purpose);
        }
    }
    // US English
//$ERRORS['US']['NUM1_MISSING'] = "<li>You did not enter number 1.";

}