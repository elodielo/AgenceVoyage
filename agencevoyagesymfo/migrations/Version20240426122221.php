<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426122221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD statut_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638F6203804 ON contact (statut_id)');
        $this->addSql('ALTER TABLE contact_resa ADD voyage_id INT DEFAULT NULL, ADD statut_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact_resa ADD CONSTRAINT FK_B83647C468C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE contact_resa ADD CONSTRAINT FK_B83647C4F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_B83647C468C9E5AF ON contact_resa (voyage_id)');
        $this->addSql('CREATE INDEX IDX_B83647C4F6203804 ON contact_resa (statut_id)');
        $this->addSql('ALTER TABLE voyage ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3F9D8955A76ED395 ON voyage (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F6203804');
        $this->addSql('DROP INDEX IDX_4C62E638F6203804 ON contact');
        $this->addSql('ALTER TABLE contact DROP statut_id');
        $this->addSql('ALTER TABLE contact_resa DROP FOREIGN KEY FK_B83647C468C9E5AF');
        $this->addSql('ALTER TABLE contact_resa DROP FOREIGN KEY FK_B83647C4F6203804');
        $this->addSql('DROP INDEX IDX_B83647C468C9E5AF ON contact_resa');
        $this->addSql('DROP INDEX IDX_B83647C4F6203804 ON contact_resa');
        $this->addSql('ALTER TABLE contact_resa DROP voyage_id, DROP statut_id');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955A76ED395');
        $this->addSql('DROP INDEX IDX_3F9D8955A76ED395 ON voyage');
        $this->addSql('ALTER TABLE voyage DROP user_id');
    }
}
