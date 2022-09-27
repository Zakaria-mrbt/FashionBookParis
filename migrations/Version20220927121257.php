<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927121257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE story_like (id INT AUTO_INCREMENT NOT NULL, id_story_id INT NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_3ACE2C9DFA86ACA3 (id_story_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE story_like ADD CONSTRAINT FK_3ACE2C9DFA86ACA3 FOREIGN KEY (id_story_id) REFERENCES story (id)');
        $this->addSql('ALTER TABLE story DROP FOREIGN KEY FK_EB560438A76B6C5F');
        $this->addSql('DROP INDEX IDX_EB560438A76B6C5F ON story');
        $this->addSql('ALTER TABLE story ADD image_name VARCHAR(255) NOT NULL, DROP id_profil_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE story_like DROP FOREIGN KEY FK_3ACE2C9DFA86ACA3');
        $this->addSql('DROP TABLE story_like');
        $this->addSql('ALTER TABLE story ADD id_profil_id INT NOT NULL, DROP image_name');
        $this->addSql('ALTER TABLE story ADD CONSTRAINT FK_EB560438A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_EB560438A76B6C5F ON story (id_profil_id)');
    }
}
