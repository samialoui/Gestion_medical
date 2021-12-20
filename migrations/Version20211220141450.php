<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220141450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secretaire ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secretaire ADD CONSTRAINT FK_7DB5C2D0A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7DB5C2D0A76ED395 ON secretaire (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secretaire DROP FOREIGN KEY FK_7DB5C2D0A76ED395');
        $this->addSql('DROP INDEX UNIQ_7DB5C2D0A76ED395 ON secretaire');
        $this->addSql('ALTER TABLE secretaire DROP user_id');
    }
}
