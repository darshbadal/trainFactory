<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124112848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3217BBB47 ON lesson (person_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3217BBB47');
        $this->addSql('DROP INDEX IDX_F87474F3217BBB47 ON lesson');
        $this->addSql('ALTER TABLE lesson DROP person_id');
    }
}
