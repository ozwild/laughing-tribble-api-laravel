<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = $this->createAccount();
        $user = User::first();
        $user->accounts()->attach($account->id);

        /*$account2 = Account::create([
            'name' => 'aalkdjsf',
            'description' => 'aldkfjasdfasdf',
            'avatar_url' => 'aasdif',
            'country' => 'ES',
        ]);
        $user->accounts()->attach($account2->id);*/

        $this->createCollections($account);
    }

    private function createAccount()
    {
        $account = new Account([
            'id' => 'a94896b8-e432-4b6d-83fa-2476d8f6b42e',
            'name' => 'Ozwild',
            'avatar_url' => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/account.jpg",
            'country' => 'GT'
        ]);

        $account->description = "Soy un loco!
Estudio y practico musica,
y soy programador de profesión y vocación.


Canto. Canto por la vida y canto para mí.
Canto porque el pecho me revienta si no.


Soy productor musical en formación.
Iniciado por necesidad, adquirido como gusto.


Un fanático de buenas historias.
Del mundo y sus mil y un cuentos por contar.
De la naturaleza, de los animales,
las plantas y sus maravillas.";


        $account->save();
        return $account;
    }

    private function createCollections(Account $account)
    {
        $collection = $account->collections()->create([
            "id" => "bee7e02c-5f06-4d9c-9532-5c5249f09665",
            "title" => "Placebo",
            "art_url" => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/bee7e02c-5f06-4d9c-9532-5c5249f09665.jpg",
        ]);
        $collection->tracks()->createMany([
            [
                "id" => "770c19f6-3b12-4268-a2fb-388998da3cb4",
                "title" => "Special K",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/770c19f6-3b12-4268-a2fb-388998da3cb4.mp3",
                "bpm" => 159,
                "key" => "D♭ Major",
                "duration" => 231,
                "type" => "COVER",
            ]
        ]);


        $collection = $account->collections()->create([
            "id" => "b3188fab-6644-4832-8015-c89bc00d552a",
            "title" => "Depeche Mode",
            "art_url" => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/b3188fab-6644-4832-8015-c89bc00d552a.jpg",
        ]);
        $collection->tracks()->createMany([
            [
                "id" => "4f891a13-2a84-49bd-b619-9c701d0e0b15",
                "title" => "Nothing's Impossible",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/4f891a13-2a84-49bd-b619-9c701d0e0b15.mp3",
                "bpm" => 109,
                "key" => "A Major",
                "duration" => 231,
                "type" => "COVER",
            ]
        ]);


        $collection = $account->collections()->create([
            "id" => "41b0b6f9-f97e-42ec-a915-008ef762ebc0",
            "title" => "Radiohead",
            "art_url" => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/41b0b6f9-f97e-42ec-a915-008ef762ebc0.jpg",
        ]);
        $collection->tracks()->createMany([
            [
                "id" => "f7f8df93-b284-425b-a859-36e601e0b734",
                "title" => "Knives Out",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/f7f8df93-b284-425b-a859-36e601e0b734.mp3",
                "bpm" => 137,
                "key" => "D Minor",
                "duration" => 248,
                "type" => "COVER",
            ],
            [
                "id" => "37ff220d-fd33-4abe-bd61-5000680c01cc",
                "title" => "A Wolf at the Door",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/37ff220d-fd33-4abe-bd61-5000680c01cc.mp3",
                "bpm" => 139,
                "key" => "G Major",
                "duration" => 197,
                "type" => "COVER",
            ],
            [
                "id" => "7321fd67-5c3a-4464-8296-94449c9f306a",
                "title" => "2 + 2 = 5",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/7321fd67-5c3a-4464-8296-94449c9f306a.mp3",
                "bpm" => 150,
                "key" => "F Minor",
                "duration" => 248,
                "type" => "COVER",
            ]
        ]);

        $collection = $account->collections()->create([
            "id" => "dc33e6a6-1b17-4e64-8884-068b47c31523",
            "title" => "Experimentos",
            "art_url" => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/dc33e6a6-1b17-4e64-8884-068b47c31523.jpg",
        ]);
        $collection->tracks()->createMany([
            [
                "id" => "4053bc16-ed97-4435-b4d5-1fa88629b8f6",
                "title" => "Codigo: Squalid Horrors",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/4053bc16-ed97-4435-b4d5-1fa88629b8f6.mp3",
                "bpm" => 160,
                "key" => "F Major",
                "duration" => 248,
                "type" => "ORIGINAL",
            ]
        ]);

        $collection = $account->collections()->create([
            "id" => "fd2901cf-e589-4e3c-9f1c-7e75de1af314",
            "title" => "Beatles",
            "art_url" => "/img/a94896b8-e432-4b6d-83fa-2476d8f6b42e/fd2901cf-e589-4e3c-9f1c-7e75de1af314.jpg",
        ]);
        $collection->tracks()->createMany([
            [
                "id" => "1d3dd23d-6d84-4ff9-92ac-1e024eae445f",
                "title" => "While My Guitar Gently Weeps",
                "source" => "/audio/a94896b8-e432-4b6d-83fa-2476d8f6b42e/1d3dd23d-6d84-4ff9-92ac-1e024eae445f.mp3",
                "bpm" => 115,
                "key" => "E Minor",
                "duration" => 245,
                "type" => "COVER",
            ]
        ]);


    }
}
