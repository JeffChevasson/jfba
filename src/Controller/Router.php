<?php
class Router
{
	private $_ctrl;
	private $_view;

	public funtion routereq()
	{

		try
		{
			// CHARGEMENT AUTOMATIQUE DES CLASSES
			spl_autoload_register(function($class){
				require_once('model/'.$class.'.php');
			});

			$url = '';
			
			// LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
			if(isset($_GET['url']))
			{
				$url = explode('', filter_var($_GET['url'], FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
				$controllerFile =  "controller/".controllerClass.".php";

				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					$this->_ctrl = new controllerClass($url);
				}
				else
					throw new Exception("Page introuvable");
		{
			else 
		/**
		 * La page ControllerAccueil est a créer
		 */
			{
				require_once('controller/ControllerAccueil.php');
				$this->_ctrl = new ControllerAccueil($url);
			}
		}				

		/**
		 * La page ViewError est a créer
		 */

		catch(Exception $e)
		{
			$errorMsg = e->getMessage();
			require_once('view/viewError.php');
		}

			}	

		}

	}

}