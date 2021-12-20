<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220140350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP INDEX IDX_1ADAD7EB62FF6CDF, ADD UNIQUE INDEX UNIQ_1ADAD7EB62FF6CDF (consultation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP INDEX UNIQ_1ADAD7EB62FF6CDF, ADD INDEX IDX_1ADAD7EB62FF6CDF (consultation_id)');
    }
}
