<?php

namespace Database\Seeders;

use App\Models\QuiSommeNous;
use Illuminate\Database\Seeder;

class QuiSommeNousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuiSommeNous::create([
            'titre1' => 'Qui sommes-nous ',
            'titre2' => 'Nos valeurs',
            'titre3' => 'Nos objectifs',
            'titre4' => 'Nos locaux',

            'para1' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, mollitia officia! Distinctio,
            itaque! Modi pariatur quo explicabo expedita dicta, debitis quae nemo consequatur quidem dolorum laborum adipisci quos, commodi molestiae!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam veniam id numquam ad reiciendis, recusandae aperiam
            asperiores voluptatem iusto deserunt optio saepe sunt temporibus, neque quis ea a ex eos. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Alias aperiam ipsa quis tempora mollitia, accusamus corporis aut iusto quisquam quidem
            eveniet ipsam rem exercitationem perspiciatis. Vel dolor vitae eum velit? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quam qui suscipit magnam consequuntur, voluptas, commodi impedit, rerum alias quaerat
            exercitationem quia tempora. Deleniti vitae nemo, itaque libero nostrum neque harum.',
            
            'para2' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, mollitia officia! Distinctio,
            itaque! Modi pariatur quo explicabo expedita dicta, debitis quae nemo consequatur quidem dolorum laborum adipisci quos, commodi molestiae!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam veniam id numquam ad reiciendis, recusandae aperiam
            asperiores voluptatem iusto deserunt optio saepe sunt temporibus, neque quis ea a ex eos. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Alias aperiam ipsa quis tempora mollitia, accusamus corporis aut iusto quisquam quidem
            eveniet ipsam rem exercitationem perspiciatis. Vel dolor vitae eum velit? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quam qui suscipit magnam consequuntur, voluptas, commodi impedit, rerum alias quaerat
            exercitationem quia tempora. Deleniti vitae nemo, itaque libero nostrum neque harum.',
            
            'para3' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, mollitia officia! Distinctio,
            itaque! Modi pariatur quo explicabo expedita dicta, debitis quae nemo consequatur quidem dolorum laborum adipisci quos, commodi molestiae!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam veniam id numquam ad reiciendis, recusandae aperiam
            asperiores voluptatem iusto deserunt optio saepe sunt temporibus, neque quis ea a ex eos. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Alias aperiam ipsa quis tempora mollitia, accusamus corporis aut iusto quisquam quidem
            eveniet ipsam rem exercitationem perspiciatis. Vel dolor vitae eum velit? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quam qui suscipit magnam consequuntur, voluptas, commodi impedit, rerum alias quaerat
            exercitationem quia tempora. Deleniti vitae nemo, itaque libero nostrum neque harum.',
            
            'para4' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, mollitia officia! Distinctio,
            itaque! Modi pariatur quo explicabo expedita dicta, debitis quae nemo consequatur quidem dolorum laborum adipisci quos, commodi molestiae!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam veniam id numquam ad reiciendis, recusandae aperiam
            asperiores voluptatem iusto deserunt optio saepe sunt temporibus, neque quis ea a ex eos. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Alias aperiam ipsa quis tempora mollitia, accusamus corporis aut iusto quisquam quidem
            eveniet ipsam rem exercitationem perspiciatis. Vel dolor vitae eum velit? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quam qui suscipit magnam consequuntur, voluptas, commodi impedit, rerum alias quaerat
            exercitationem quia tempora. Deleniti vitae nemo, itaque libero nostrum neque harum.',
            
            'file_path1' => 'public/frontend/img/placeholders/marche-la-rochelle-tourisme-agence-les-conteurs-38.jpg',
            'file_path2' => 'public/frontend/img/placeholders/marche-la-rochelle-tourisme-agence-les-conteurs-38.jpg'
        ]);
    }
}
