<?php
    namespace AppBundle\Command;

    use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use AppBundle\Form\AnnonceType;
    use AppBundle\Entity\Annonce;


    class AnnonceCommande extends ContainerAwareCommand
    {
        protected function configure()
        {
            $this
                ->setName('Annonce:id')
                ->setDescription('get annonce')
                ->addArgument(
                    'id',
                    InputArgument::OPTIONAL,
                    'quelle article voulez vous afficher ?'
                )
                ->addOption(
                    'yell',
                    null,
                    InputOption::VALUE_NONE,
                    'If set, the task will yell in uppercase letters'
                )
            ;
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {

            $em = $this->getContainer()->get('doctrine')->getManager();
            $name = $input->getArgument('id');
            if ($name) {
                $annonce = $em->getRepository('AppBundle:Annonce')
                              ->find($name);

                if ($annonce != null) {
                    $text = "id =" . $annonce->getId();
                    $output->writeln($text);
                    $text = "titre =" . $annonce->getNom();
                    $output->writeln($text);
                    $text = "desc =" . $annonce->getDescription();
                    $output->writeln($text);
                    $text = "prix =" . $annonce->getPrix();
                    $output->writeln($text);
                    $text = "email =" . $annonce->getMail();
                    $output->writeln($text);
                }else{
                    $output->writeln("id non valide");
                }

            } else {
                $text = 'Saisire un identifiant';
            }

        }
    }

 ?>
