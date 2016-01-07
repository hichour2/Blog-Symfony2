<?php
namespace Fose\FoseBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Fose\FoseBundle\Form\ArticleType;
use Fose\FoseBundle\Form\ArticleEditType;

use Fose\FoseBundle\Entity\Article;
use Fose\FoseBundle\Entity\ArticleRepository;
use Fose\FoseBundle\Entity\Membredeclub;
use Fose\FoseBundle\Form\MembredeclubType;
use Fose\FoseBundle\Form\MembredeclubEditType;
use Fose\FoseBundle\Entity\MessageRepository;
use Fose\FoseBundle\Entity\Message;
use Fose\FoseBundle\Form\MessageType;
use Fose\FoseBundle\Entity\lienRepository;
use Fose\FoseBundle\Entity\MembredeclubRepository;
use Fose\FoseBundle\Entity\lien;
use Fose\FoseBundle\Form\lienType;
use Fose\FoseBundle\Form\lienEditType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FoseController extends Controller
{
    public function indexAction($pages)
    {
       
         if ($pages <1) {
// On déclenche une exception NotFoundHttpException
// Cela va afficher la page d'erreur 404
// On pourra la personnaliser plus tard
throw $this->createNotFoundException('Page inexistante (page =
'.$pages.')');
}
// Pour récupérer la liste de tous les articles : on utilise findAll()
$articles = $this->getDoctrine()
            ->getManager()
            ->getRepository('FoseFoseBundle:Article')
            ->getArticles(4,$pages);// 3 articles par page
            
// L'appel de la vue ne change pas
// On ajoute ici les variables page et nb_page à la vue
return $this->render('FoseFoseBundle:Default:index.html.twig',array(
'articles' => $articles,
'page' => $pages,
'nombrePage' => ceil(count($articles)/3)
));
    }
    public function blogAction()
    {
        return $this->render('FoseFoseBundle:pages:blog.html.twig');
    }
    public function diaporamaAction()
    {
        return $this->render('FoseFoseBundle:pages:diaporama.html.twig');
    }public function contactAction()
    {
        return $this->render('FoseFoseBundle:pages:contact.html.twig');
    }
    public function afficherAction()
    {
        return $this->render('FoseFoseBundle:pages:single.html.twig');
    }
    public function ajouterAction(){
    $article = new Article();
// On crée le FormBuilder grâce à la méthode du contrôleur
$form = $this->createForm(new ArticleType, $article);

// On récupère la requête
$request = $this->get('request');
// On vérifie qu'elle est de type POST
if ($request->getMethod() == 'POST') {
// On fait le lien Requête <-> Formulaire
// À partir de maintenant, la variable $article contient les valeurs entrées dans le formulaire par le visiteur
$form->bind($request);
// On vérifie que les valeurs entrées sont correctes
// (Nous verrons la validation des objets en détail dans le prochain chapitre)
if ($form->isValid()) {
// On l'enregistre notre objet $article dans la base de données

//$this->getRequest()->query->get('blabla') ;
//$this->getRequest()->request->get('blabla');

$em = $this->getDoctrine()->getManager();
$em->persist($article);
$em->flush();
$article= new Article();
     $form = $this->createForm(new ArticleType, $article);
// On redirige vers la page de visualisation de l'article nouvellement créé

}
}
// À ce stade :
// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
// - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
return $this->render('FoseFoseBundle:admin:ajouter.html.twig',array('form' => $form->createView()));
    
    }
public function afficherarticleAction($page){
    
     if ($page < 1) {
// On déclenche une exception NotFoundHttpException
// Cela va afficher la page d'erreur 404
// On pourra la personnaliser plus tard
throw $this->createNotFoundException('Page inexistante (page =
'.$page.')');
}
// Pour récupérer la liste de tous les articles : on utilise findAll()
$articles = $this->getDoctrine()
            ->getManager()
            ->getRepository('FoseFoseBundle:Article')
            ->getArticles(3,$page);// 3 articles par page
// L'appel de la vue ne change pas
// On ajoute ici les variables page et nb_page à la vue
return $this->render('FoseFoseBundle:admin\afficher:afficher.html.twig',array(
'articles' => $articles,
'page' => $page,
'nombrePage' => ceil(count($articles)/3)
));

} 
  public function ajouterMembreAction(){
    $membre= new Membredeclub();
// On crée le FormBuilder grâce à la méthode du contrôleur
$form = $this->createForm(new MembredeclubType, $membre);

// On récupère la requête
$request = $this->get('request');
// On vérifie qu'elle est de type POST
if ($request->getMethod() == 'POST') {
// On fait le lien Requête <-> Formulaire
// À partir de maintenant, la variable $article contient les valeurs entrées dans le formulaire par le visiteur
$form->bind($request);
// On vérifie que les valeurs entrées sont correctes
// (Nous verrons la validation des objets en détail dans le prochain chapitre)
if ($form->isValid()) {
// On l'enregistre notre objet $membre dans la base de données
    
$em = $this->getDoctrine()->getManager();
$em->persist($membre);
$em->flush();
$membre= new Membredeclub();
     $form = $this->createForm(new MessageType, $membre);
// On redirige vers la page de visualisation des membre nouvellement créé

}
//// À ce stade :
// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
// - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule

} 

 return $this->render('FoseFoseBundle:admin:ajouter_membre.html.twig',array('form' => $form->createView()));


}  
 public function envoiemsgAction(){
    $msg= new Message();
// On crée le FormBuilder grâce à la méthode du contrôleur
$form = $this->createForm(new MessageType, $msg);

// On récupère la requête
$request = $this->get('request');
// On vérifie qu'elle est de type POST
if ($request->getMethod() == 'POST') {
// On fait le lien Requête <-> Formulaire
// À partir de maintenant, la variable $msg  contient les valeurs entrées dans le formulaire par le visiteur
$form->bind($request);
// On vérifie que les valeurs entrées sont correctes
// (Nous verrons la validation des objets en détail dans le prochain chapitre)
if ($form->isValid()) {

// On l'enregistre notre objet $msg dans la base de données

//$this->getRequest()->query->get('blabla') ;
//$this->getRequest()->request->get('blabla');
 

$em = $this->getDoctrine()->getManager();
$em->persist($msg);
$em->flush();
// On redirige vers la page de visualisation de l'article nouvellement créé
$msg= new Message();
     $form = $this->createForm(new MessageType, $msg);
}
//// À ce stade :
// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
// - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule

 } return $this->render('FoseFoseBundle:pages:contact.html.twig',array('form' => $form->createView()));
}
 public function ajouterlienAction(){
    $lien= new lien();
// On crée le FormBuilder grâce à la méthode du contrôleur
$form = $this->createForm(new lienType, $lien);

// On récupère la requête
$request = $this->get('request');
// On vérifie qu'elle est de type POST
if ($request->getMethod() == 'POST') {
// On fait le lien Requête <-> Formulaire
// À partir de maintenant, la variable $msg  contient les valeurs entrées dans le formulaire par le visiteur
$form->bind($request);
// On vérifie que les valeurs entrées sont correctes
// (Nous verrons la validation des objets en détail dans le prochain chapitre)
if ($form->isValid()) {

$em = $this->getDoctrine()->getManager();
$em->persist($lien);
$em->flush();

// On redirige vers la page de visualisation de l'article nouvellement créé
$lien= new lien();
$form = $this->createForm(new lienType, $lien);
}
//// À ce stade :
// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
// - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule

 } return $this->render('FoseFoseBundle:admin:ajouterlien.html.twig',array('form' => $form->createView()));
}

public function editerarticleAction(Article $article){
    {

$form = $this->createForm(new ArticleEditType(), $article);
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {
    // On enregistre l'article
$em = $this->getDoctrine()->getManager();
$em->persist($article);
$em->flush();
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Article
bien modifié');
return $this->redirect($this->generateUrl('fose_editer_article',
array('id' => $article->getId())));
}
}
return $this->render('FoseFoseBundle:admin\afficher:modifier.html.twig',
array(
'form' => $form->createView(),
'article' => $article
));
}
}
public function suprimerarticleAction(Article $article){
    
// On crée un formulaire vide, qui ne contiendra que le champ CSRF
// Cela permet de protéger la suppression d'article contre cette faille
$form = $this->createFormBuilder()->getForm();
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {

// On supprime l'article
$em = $this->getDoctrine()->getManager();
$em->remove($article);
$em->flush();
}
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Article bien supprimé');
// Puis on redirige vers l'accueil

return $this->redirect($this->generateUrl('fose_afficher_article'));
}

return $this->render('FoseFoseBundle:admin\afficher:suprimer.html.twig',
array(
'article' => $article,
'form' => $form->createView()
));
}
public function afficherlienAction($page){
    
     if ($page < 1) {
// On déclenche une exception NotFoundHttpException
// Cela va afficher la page d'erreur 404
// On pourra la personnaliser plus tard
throw $this->createNotFoundException('Page inexistante (page =
'.$page.')');
}
// Pour récupérer la liste de tous les articles : on utilise findAll()
$liens = $this->getDoctrine()
            ->getManager()
            ->getRepository('FoseFoseBundle:lien')
            ->getLiens(3,$page);// 3 articles par page
// L'appel de la vue ne change pas
// On ajoute ici les variables page et nb_page à la vue
return $this->render('FoseFoseBundle:admin\afficher:afficherlien.html.twig',array(
'liens' => $liens,
'page' => $page,
'nombrePage' => ceil(count($liens)/3)
));

} 
public function editerlienAction(Lien $lien){
    {

$form = $this->createForm(new LienEditType(), $lien);
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {
    // On enregistre l'article
$em = $this->getDoctrine()->getManager();
$em->persist($lien);
$em->flush();
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Lien
bien modifié');
return $this->redirect($this->generateUrl('fose_editer_lien',
array('id' => $lien->getId())));
}
}
return $this->render('FoseFoseBundle:admin\afficher:modifierlien.html.twig',
array(
'form' => $form->createView(),
'lien' => $lien
));
}
}
public function suprimerlienAction(Lien $lien){
    
// On crée un formulaire vide, qui ne contiendra que le champ CSRF
// Cela permet de protéger la suppression d'article contre cette faille
$form = $this->createFormBuilder()->getForm();
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {

// On supprime l'article
$em = $this->getDoctrine()->getManager();
$em->remove($lien);
$em->flush();
}
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Lien bien supprimé');
// Puis on redirige vers l'accueil

return $this->redirect($this->generateUrl('fose_afficher_lien'));
}

return $this->render('FoseFoseBundle:admin\afficher:suprimerlien.html.twig',
array(
'lien' => $lien,
'form' => $form->createView()
));
}
public function affichermbrAction($page){
    
     if ($page < 1) {
// On déclenche une exception NotFoundHttpException
// Cela va afficher la page d'erreur 404
// On pourra la personnaliser plus tard
throw $this->createNotFoundException('Page inexistante (page =
'.$page.')');
}
// Pour récupérer la liste de tous les articles : on utilise findAll()
$mbrs = $this->getDoctrine()
            ->getManager()
            ->getRepository('FoseFoseBundle:Membredeclub')
            ->getMembres(3,$page);// 3 articles par page
// L'appel de la vue ne change pas
// On ajoute ici les variables page et nb_page à la vue
return $this->render('FoseFoseBundle:admin\afficher:affichermembre.html.twig',array(
'mbrs' => $mbrs,
'page' => $page,
'nombrePage' => ceil(count($mbrs)/3)
));

}
public function editermbrAction(Membredeclub $mbr){
    {

$form = $this->createForm(new MembredeclubEditType(), $mbr);
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {
    // On enregistre l'article
$em = $this->getDoctrine()->getManager();
$em->persist($mbr);
$em->flush();
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Membre
bien modifié');
return $this->redirect($this->generateUrl('fose_editer_mbr',
array('id' => $mbr->getId())));
}
}
return $this->render('FoseFoseBundle:admin\afficher:modifiermbr.html.twig',
array(
'form' => $form->createView(),
'mbr' => $mbr
));
}
}

public function suprimermbrAction(Membredeclub $mbr){
    
// On crée un formulaire vide, qui ne contiendra que le champ CSRF
// Cela permet de protéger la suppression d'article contre cette faille
$form = $this->createFormBuilder()->getForm();
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {

// On supprime l'article
$em = $this->getDoctrine()->getManager();
$em->remove($mbr);
$em->flush();
}
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Membre bien supprimé');
// Puis on redirige vers l'accueil

return $this->redirect($this->generateUrl('fose_afficher_mbr'));
}

return $this->render('FoseFoseBundle:admin\afficher:supprimermbr.html.twig',
array(
'mbr' => $mbr,
'form' => $form->createView()
));
}
public function suprimermsgAction(Message $msg){
    
// On crée un formulaire vide, qui ne contiendra que le champ CSRF
// Cela permet de protéger la suppression d'article contre cette faille
$form = $this->createFormBuilder()->getForm();
$request = $this->getRequest();
if ($request->getMethod() == 'POST') {
$form->bind($request);
if ($form->isValid()) {

// On supprime l'article
$em = $this->getDoctrine()->getManager();
$em->remove($msg);
$em->flush();
}
// On définit un message flash
$this->get('session')->getFlashBag()->add('info', 'Message bien supprimé');
// Puis on redirige vers l'accueil

return $this->redirect($this->generateUrl('fose_afficher_msg'));
}

return $this->render('FoseFoseBundle:admin\afficher:suprimermsg.html.twig',
array(
'msg' => $msg,
'form' => $form->createView()
));
}
public function affichermsgAction($page){
    
     if ($page < 1) {
// On déclenche une exception NotFoundHttpException
// Cela va afficher la page d'erreur 404
// On pourra la personnaliser plus tard
throw $this->createNotFoundException('Page inexistante (page =
'.$page.')');
}
// Pour récupérer la liste de tous les articles : on utilise findAll()
$msgs = $this->getDoctrine()
            ->getManager()
            ->getRepository('FoseFoseBundle:Message')
            ->getMessages(3,$page);// 3 articles par page
// L'appel de la vue ne change pas
// On ajoute ici les variables page et nb_page à la vue
return $this->render('FoseFoseBundle:admin\afficher:affichermsg.html.twig',array(
'msgs' => $msgs,
'page' => $page,
'nombrePage' => ceil(count($msgs)/3)
));

}
public function pdfAction(){
        $html = $this->renderView('FoseFoseBundle:default:pdf.html.twig');
        
//on appelle le service html2pdf
$html2pdf = $this->get('html2pdf_factory')->create();
//real : utilise la taille réelle
$html2pdf->pdf->SetDisplayMode('real');
//writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
$html2pdf->writeHTML($html);
//Output envoit le document PDF au navigateur internet
return new Response($html2pdf->Output('nom-du-pdf.pdf'), 200, array('Content-Type' => 'application/pdf'));
}}


