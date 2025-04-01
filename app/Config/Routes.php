<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // route pour login
 // route pour index (liste des rattrapage ou ds)
 // route pour mot de passe oublié
 // route pour modifier un rattrapage (modifier la salle, elèves)
 // route pour ajouter un rattrapage (Ajouter les infos nécessaires comme date, salle, eleves, etc)
 // route pour modifier/ajouter les ds
 // route page admin pour directeur

$routes->get('/', 'LoginController::index');
$routes->post('/','LoginController::loginAuth');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/rattrapages', 'AccueilController::index');
$routes->post('/rattrapages', 'AccueilController::ajouterRattrapage');

$routes->get('/rattrapages/modifier/(:any)', 'AccueilController::modifierRattrapagesView/$1');
$routes->post('/rattrapages/updateDir/', 'AccueilController::updateRattrapageDirecteur');
$routes->post('/rattrapages/updateEns/', 'AccueilController::updateRattrapageEnseignant');

$routes->get('/rattrapages/supprimer/(:any)', 'AccueilController::supprimerRattrapage/$1');

$routes->get('/resetPassword', 'ResetPasswordController::index');

$routes->get('/ajoutEnseignant', 'GestionEnseignantsController::index');
$routes->post('/ajoutEnseignant', 'GestionEnseignantsController::ajoutEnseignant');

$routes->get('/forgotPassword', 'ForgotPasswordController::index');
$routes->post('/forgotPassword', 'ForgotPasswordController::sendResetLink');

$routes->get('/updatePassword/(:any)', 'ResetPasswordController::index/$1');
$routes->post('/updatePassword', 'ResetPasswordController::updatePassword');

$routes->post('/filtre/ressources', 'AccueilController::getAllRessource');