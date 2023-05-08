<div class="modal fade" id="improvementModal" tabindex="-1" role="dialog" aria-labelledby="improvementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="improvementModalLabel">Предложить улучшение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('contact.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Введите ваше имя" value="{{ old('name') }}" required>
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Ваш Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required placeholder="Введите ваш email">
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Предложение или замечание</label>
                        <textarea class="form-control" name="message" id="message" rows="3" placeholder="Опишите ваше предложение или замечание" required>{{ old('message') }}</textarea>
                        @error('message')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
