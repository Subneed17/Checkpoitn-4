<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721090851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animaux (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, race VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, vaccinate TINYINT(1) NOT NULL, sterilized TINYINT(1) NOT NULL, puced TINYINT(1) NOT NULL, castration TINYINT(1) NOT NULL, INDEX IDX_9ABE194D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, dog VARCHAR(255) NOT NULL, cat VARCHAR(255) NOT NULL, other VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_animaux (message_id INT NOT NULL, animaux_id INT NOT NULL, INDEX IDX_A362341537A1329 (message_id), INDEX IDX_A362341A9DAECAA (animaux_id), PRIMARY KEY(message_id, animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animaux ADD CONSTRAINT FK_9ABE194D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE message_animaux ADD CONSTRAINT FK_A362341537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_animaux ADD CONSTRAINT FK_A362341A9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_animaux DROP FOREIGN KEY FK_A362341A9DAECAA');
        $this->addSql('ALTER TABLE animaux DROP FOREIGN KEY FK_9ABE194D12469DE2');
        $this->addSql('ALTER TABLE message_animaux DROP FOREIGN KEY FK_A362341537A1329');
        $this->addSql('DROP TABLE animaux');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_animaux');
    }
}
