@extends('layouts.faq')

@section('content1')

    <div class="faq_container">
        <h3>Foire aux questions :</h3>

        @foreach ($categories as $key => $value)
            <div class="question_list">
                <div class="faq">
                    <div class="categories">
                        <?php $id = $value['id']; ?>
                        <h3>{{ $value['nom'] }}</h3>

                        <span class="iconify" data-icon="bx:bxs-down-arrow" style="color: var(--text-color1);"
                            data-height="30"></span>
                    </div>
                    @foreach ($value->faqBlocs as $var)
                        <div class="questions">
                            <hr class="hr-fade">
                            <h4 class="q">{{ $var['question'] }}</h4>
                            <p class="noselect">{{ $var['reponse'] }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>


    </div>
    <script lang="js">
        let answers = document.querySelectorAll(".faq");
        answers.forEach((event) => {
            event.addEventListener('click', () => {
                /*si lorsque l'on click sur la div, le contenu de la liste est activé 
                alors on vide la liste
                sinon on l'active (on remplit la liste)
                */
                if (event.classList.contains("active")) {
                    event.classList.remove("active");
                } else {
                    event.classList.add("active");
                }
            })
        })
    </script>




@endsection
