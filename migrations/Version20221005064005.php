<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005064005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_skills (character_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_7673D5E31136BE75 (character_id), INDEX IDX_7673D5E37FF61858 (skills_id), PRIMARY KEY(character_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_skills ADD CONSTRAINT FK_7673D5E31136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_skills ADD CONSTRAINT FK_7673D5E37FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_skills DROP FOREIGN KEY FK_7673D5E31136BE75');
        $this->addSql('ALTER TABLE character_skills DROP FOREIGN KEY FK_7673D5E37FF61858');
        $this->addSql('DROP TABLE character_skills');
    }
}
