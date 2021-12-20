<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220142005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD pat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A663EFD976 FOREIGN KEY (pat_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_964685A663EFD976 ON consultation (pat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A663EFD976');
        $this->addSql('DROP INDEX UNIQ_964685A663EFD976 ON consultation');
        $this->addSql('ALTER TABLE consultation DROP pat_id');
    }
}
