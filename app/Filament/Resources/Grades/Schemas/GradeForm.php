<?php

namespace App\Filament\Resources\Grades\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GradeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('enrollment_id')
                    ->relationship('enrollment', 'id')
                    ->required(),
                TextInput::make('assessment_name')
                    ->required(),
                TextInput::make('marks_obtained')
                    ->required()
                    ->numeric(),
                TextInput::make('total_marks')
                    ->required()
                    ->numeric(),
            ]);
    }
}
