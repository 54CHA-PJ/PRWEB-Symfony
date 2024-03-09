<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240309190535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP CONSTRAINT book_pkey');
        $this->addSql('ALTER TABLE book DROP id');
        $this->addSql('ALTER TABLE book RENAME COLUMN book_authors TO book_author');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (book_id)');
        $this->addSql('ALTER TABLE borrow DROP CONSTRAINT FK_55DBA8B0217BBB47');
        $this->addSql('ALTER TABLE borrow DROP CONSTRAINT FK_55DBA8B016A2B381');
        $this->addSql('ALTER TABLE borrow DROP CONSTRAINT borrow_pkey');
        $this->addSql('ALTER TABLE borrow DROP id');
        $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B0217BBB47 FOREIGN KEY (person_id) REFERENCES person (personId) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B016A2B381 FOREIGN KEY (book_id) REFERENCES book (bookId) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE borrow ADD PRIMARY KEY (borrow_id)');
        $this->addSql('ALTER TABLE person DROP CONSTRAINT person_pkey');
        $this->addSql('ALTER TABLE person ADD person_lastname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE person ADD person_birthdate DATE NOT NULL');
        $this->addSql('ALTER TABLE person DROP id');
        $this->addSql('ALTER TABLE person RENAME COLUMN person_name TO person_firstname');
        $this->addSql('ALTER TABLE person ADD PRIMARY KEY (person_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE borrow DROP CONSTRAINT fk_55dba8b0217bbb47');
        $this->addSql('ALTER TABLE borrow DROP CONSTRAINT fk_55dba8b016a2b381');
        $this->addSql('DROP INDEX borrow_pkey');
        $this->addSql('ALTER TABLE borrow ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE borrow ADD CONSTRAINT fk_55dba8b0217bbb47 FOREIGN KEY (person_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE borrow ADD CONSTRAINT fk_55dba8b016a2b381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE borrow ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX book_pkey');
        $this->addSql('ALTER TABLE book ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE book RENAME COLUMN book_author TO book_authors');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX person_pkey');
        $this->addSql('ALTER TABLE person ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE person ADD person_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE person DROP person_firstname');
        $this->addSql('ALTER TABLE person DROP person_lastname');
        $this->addSql('ALTER TABLE person DROP person_birthdate');
        $this->addSql('ALTER TABLE person ADD PRIMARY KEY (id)');
    }
}
