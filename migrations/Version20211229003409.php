<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229003409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations ADD examens_clinique_id INT DEFAULT NULL, ADD evolution_id INT DEFAULT NULL, ADD examens_comp_id INT DEFAULT NULL, ADD traitement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE602A7877187 FOREIGN KEY (examens_clinique_id) REFERENCES examens_clinique (id)');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE602CDFF215A FOREIGN KEY (evolution_id) REFERENCES evolution (id)');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE6026120CFB7 FOREIGN KEY (examens_comp_id) REFERENCES examens_complementaire (id)');
        $this->addSql('ALTER TABLE hospitalisations ADD CONSTRAINT FK_9DEE602DDA344B6 FOREIGN KEY (traitement_id) REFERENCES traitements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE602A7877187 ON hospitalisations (examens_clinique_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE602CDFF215A ON hospitalisations (evolution_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE6026120CFB7 ON hospitalisations (examens_comp_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DEE602DDA344B6 ON hospitalisations (traitement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE602A7877187');
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE602CDFF215A');
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE6026120CFB7');
        $this->addSql('ALTER TABLE hospitalisations DROP FOREIGN KEY FK_9DEE602DDA344B6');
        $this->addSql('DROP INDEX UNIQ_9DEE602A7877187 ON hospitalisations');
        $this->addSql('DROP INDEX UNIQ_9DEE602CDFF215A ON hospitalisations');
        $this->addSql('DROP INDEX UNIQ_9DEE6026120CFB7 ON hospitalisations');
        $this->addSql('DROP INDEX UNIQ_9DEE602DDA344B6 ON hospitalisations');
        $this->addSql('ALTER TABLE hospitalisations DROP examens_clinique_id, DROP evolution_id, DROP examens_comp_id, DROP traitement_id');
    }
}
