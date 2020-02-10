<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210102859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event DROP INDEX UNIQ_3BAE0AA76B3CA4B, ADD INDEX IDX_3BAE0AA76B3CA4B (id_user)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA76B3CA4B');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA76B3CA4B FOREIGN KEY (id_user) REFERENCES user_event (id)');
        $this->addSql('ALTER TABLE user_event ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D96CF1FF6B3CA4B ON user_event (id_user)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event DROP INDEX IDX_3BAE0AA76B3CA4B, ADD UNIQUE INDEX UNIQ_3BAE0AA76B3CA4B (id_user)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA76B3CA4B');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA76B3CA4B FOREIGN KEY (id_user) REFERENCES user_event (id_user)');
        $this->addSql('ALTER TABLE user_event MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_D96CF1FF6B3CA4B ON user_event');
        $this->addSql('ALTER TABLE user_event DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_event DROP id');
        $this->addSql('ALTER TABLE user_event ADD PRIMARY KEY (id_user)');
    }
}
