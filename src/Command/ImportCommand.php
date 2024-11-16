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
    $product->setName('zxc3');
    $product->setDescription('WOW DESCR 33');
    $product->setCode('123');
    $product->setStock(13);
    $product->setPrice('14.05');

    $this->entityManager->persist($product);
    $this->entityManager->flush();

    echo 'qwewqe' . PHP_EOL;

    return Command::SUCCESS;
  }
}