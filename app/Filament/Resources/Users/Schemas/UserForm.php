<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Action::make('dari kontak')
                //     ->action(),
                TextInput::make('name')
                ->suffixAction(
                Action::make('pickContact')
                    ->icon('heroicon-m-user-plus')
                    ->tooltip('Ambil dari Kontak HP')
                    ->extraAttributes([
                        'x-on:click' => "
                            if (!('contacts' in navigator)) {
                                alert('Fitur ini tidak didukung di browser Anda. Pastikan menggunakan Chrome di Android');
                                return;
                            }

                            const props = ['name', 'tel'];
                            navigator.contacts.select(props, { multiple: false })
                                .then((contacts) => {
                                    if (contacts.length > 0) {
                                        const contact = contacts[0];
                                        
                                        // Ambil nama (nama bisa berupa array, ambil elemen pertama)
                                        const name = Array.isArray(contact.name) ? contact.name[0] : contact.name;
                                        
                                        // Ambil telepon (telepon bisa berupa array, ambil elemen pertama)
                                        let phone = Array.isArray(contact.tel) ? contact.tel[0] : contact.tel;
                                        phone = phone.replace(/[^0-9+]/g, ''); // Bersihkan format

                                        // Isi kedua input sekaligus ke dalam state Livewire
                                        \$wire.set('data.nama', name);
                                        \$wire.set('data.telp', phone);
                                    }
                                })
                                .catch((err) => console.error('Error:', err));
                        ",
                    ]),
            ),
                TextInput::make('telp'),
                TextInput::make('email')
                    ->email(),
            ]);
    }
}
