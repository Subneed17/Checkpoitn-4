<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722180127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE message_animaux');
        $this->addSql('ALTER TABLE message ADD animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8E962C16 FOREIGN KEY (animal_id) REFERENCES animaux (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F8E962C16 ON message (animal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message_animaux (message_id INT NOT NULL, animaux_id INT NOT NULL, INDEX IDX_A362341537A1329 (message_id), INDEX IDX_A362341A9DAECAA (animaux_id), PRIMARY KEY(message_id, animaux_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE message_animaux ADD CONSTRAINT FK_A362341537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_animaux ADD CONSTRAINT FK_A362341A9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8E962C16');
        $this->addSql('DROP INDEX IDX_B6BD307F8E962C16 ON message');
        $this->addSql('ALTER TABLE message DROP animal_id');
    }
}
