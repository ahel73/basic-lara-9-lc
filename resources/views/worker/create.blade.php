<div>
    <hr>

    <div>
        <form action="{{ route('workers.store') }}" method="Post">
            @csrf

            <div>
                <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
                @error('name')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="text" name="surname" placeholder="surname" value="{{ old('surname') }}">
                @error('surname')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                @error('email')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="number" name="age" placeholder="age" value="{{ old('age') }}">
               @error('age')<div>{{ $message }}</div>@enderror
            </div>

            <div style="margin-bottom: 15px;">
                <textarea name="discription" placeholder="description">
                    {{ old('description') }}
                </textarea>
                @error('discription')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input
                    {{ old('is_married') == 'on' ? ' checked' : ''}}
                    id="isMarried" type="checkbox" name="is_married">
                <label for="isMarried">Is married</label>
                @error('is_married')<div>{{ $message }}</div>@enderror
            </div>

            <div><input type="submit" value="Добавить"></div>
        </form>
    </div>
</div>
