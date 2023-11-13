<div>
    <hr>

    <div>
        <form action="{{ route('workers.update', $worker->id) }}" method="Post">
            @csrf
            @method('Patch')

            <div>
                <input type="text" name="name" placeholder="name" value="{{ old('name') ?? $worker->name }}">
                @error('name')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="text" name="surname" placeholder="surname" value="{{ old('surname') ?? $worker->surname }}" >
                @error('surname')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="email" name="email" placeholder="email" value="{{ old('email') ?? $worker->email }}">
                @error('email')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input type="number" name="age" placeholder="age" value="{{ old('age') ?? $worker->age }}">
                @error('age')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <textarea name="discription" placeholder="description">
                    {{ old('discription') ?? $worker->discription }}
                </textarea>
                @error('discription')<div>{{ $message }}</div>@enderror
            </div>

            <div>
                <input {{ $worker->is_married ? ' checked' : ''}} id="isMarried" type="checkbox" name="is_married">
                <label for="isMarried">Is married</label>
                @error('is_married')<div>{{ $message }}</div>@enderror
            </div>

            <div><input type="submit" value="Сохранить"></div>
        </form>
    </div>
</div>
