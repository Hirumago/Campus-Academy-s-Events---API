<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191204190357 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id_category INT AUTO_INCREMENT NOT NULL, label_category VARCHAR(255) NOT NULL, PRIMARY KEY(id_category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id_event INT AUTO_INCREMENT NOT NULL, id_category INT NOT NULL, id_user INT DEFAULT NULL, location VARCHAR(30) NOT NULL, private_event TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, title VARCHAR(200) NOT NULL, description VARCHAR(1000) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_3BAE0AA75697F554 (id_category), UNIQUE INDEX UNIQ_3BAE0AA76B3CA4B (id_user), PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, lastname_user VARCHAR(20) NOT NULL, firstname_user VARCHAR(20) NOT NULL, password_user VARCHAR(20) NOT NULL, role_user VARCHAR(20) NOT NULL, email_user VARCHAR(30) NOT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_event (id_user INT NOT NULL, id_event INT NOT NULL, registration_date DATETIME NOT NULL, notify TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D96CF1FFD52B4B97 (id_event), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA75697F554 FOREIGN KEY (id_category) REFERENCES category (id_category)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA76B3CA4B FOREIGN KEY (id_user) REFERENCES user_event (id_user)');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FF6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FFD52B4B97 FOREIGN KEY (id_event) REFERENCES event (id_event)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA75697F554');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FFD52B4B97');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FF6B3CA4B');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA76B3CA4B');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_event');
    }
}
