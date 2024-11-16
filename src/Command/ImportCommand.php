<?php declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

#[AsCommand(name: 'import')]
class ImportCommand extends Command {
  private $entityManager;
  public function __construct(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
    parent::__construct();
  }

  protected function execute(InputInterface $input, OutputInterface $output): int {
    $product = new Product();
    $product->setName('zxc2');
    $product->setDescription('WOW DESCR 22');
    $product->setCode(11); // TODO: try int

    $this->entityManager->persist($product);
    $this->entityManager->flush();

    echo 'qwewqe' . PHP_EOL;

    return Command::SUCCESS;
  }
}