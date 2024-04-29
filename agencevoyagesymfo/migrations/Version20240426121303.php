<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426121303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyage ADD modalite_transport_id INT DEFAULT NULL, ADD modalite_nuit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D895519A54D3B FOREIGN KEY (modalite_transport_id) REFERENCES modalite_transport (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955869A1D54 FOREIGN KEY (modalite_nuit_id) REFERENCES modalite_nuit (id)');
        $this->addSql('CREATE INDEX IDX_3F9D895519A54D3B ON voyage (modalite_transport_id)');
        $this->addSql('CREATE INDEX IDX_3F9D8955869A1D54 ON voyage (modalite_nuit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895519A54D3B');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955869A1D54');
        $this->addSql('DROP INDEX IDX_3F9D895519A54D3B ON voyage');
        $this->addSql('DROP INDEX IDX_3F9D8955869A1D54 ON voyage');
        $this->addSql('ALTER TABLE voyage DROP modalite_transport_id, DROP modalite_nuit_id');
    }
}
