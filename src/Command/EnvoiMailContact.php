<?php

namespace App\Command;

use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use App\Service\ContactService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class EnvoiMailContact extends Command
{
    private $mailer;
    private $contactService;
    private $contactRepository;
    private $userRepository;
    protected static $defaultName = 'app:envoie-contact';

    public function __construct(
        MailerInterface $mailer,
        ContactService $contactService,
        ContactRepository $contactRepository,
        UserRepository $userRepository
    ) {
        $this->mailer = $mailer;
        $this->contactService = $contactService;
        $this->contactRepository = $contactRepository;
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $aEnvoyer = $this->contactRepository->findBy(['isSend' => false]);
        $admin = $this->userRepository->findAdmin();
        $adresseAdmin = new Address(
            $admin->getEmail(),
            $admin->getUsername()
        );

        foreach ($aEnvoyer as $mail) {
            $email = (new Email())
                ->from($mail->getEmail())
                ->to($adresseAdmin)
                ->subject('Message de : ' . $mail->getPseudo())
                ->text($mail->getContenu());

            $this->mailer->send($email);

            $this->contactService->isSend($mail);
        }

        return Command::SUCCESS;
    }
}
