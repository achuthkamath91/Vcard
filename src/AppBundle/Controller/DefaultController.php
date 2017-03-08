<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use JeroenDesloovere\VCard\VCard;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
	
	/**
     * @Route("/vcard", name="homepage")
     */
    public function vCardAction(){
		// define vcard
		$vcard = new VCard();

		// define variables
		$lastname = 'Desloovere';
		$firstname = 'Jeroen';
		$additional = '';
		$prefix = '';
		$suffix = '';

		// add personal data
		$vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

		// add work data
		$vcard->addCompany('Siesqo');
		$vcard->addJobtitle('Web Developer');
		$vcard->addRole('Data Protection Officer');
		$vcard->addEmail('info@jeroendesloovere.be');
		$vcard->addPhoneNumber(1234121212, 'PREF;WORK');
		$vcard->addPhoneNumber(123456789, 'WORK');
		$vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
		$vcard->addURL('http://www.jeroendesloovere.be');

		$vcard->addPhoto(__DIR__ . '/landscape.jpeg');

		// return vcard as a string
		return $vcard->getOutput();

		// return vcard as a download
		//return $vcard->download();

		// save vcard on disk
		//$vcard->setSavePath('/path/to/directory');
		//$vcard->save();
	}
}
