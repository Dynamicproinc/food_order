<div>
    <div>
        <div class="submitting" wire:loading.flex wire:target="submit">
            <div class="spinner-border" role="status">

            </div>
        </div>
        @if ($success)
            <div class="success-submit">
                <div class="text-center">
                    <h4 class="fw-bold">👍 {{ __('Thanks for your feedback') }}</h4>
                    <p>{{ __('Thank you for sharing your thoughts. Your comment will appear after our review.') }}</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i>
                        {{ __('Back to shop') }}</a>
                </div>
            </div>
        @endif
        <form wire:submit="submit">
            <div>
                <h6 class="fw-bold">{{ __('Submit Your Feedback') }}</h6>



                <div class="d-flex star-rating-lg mb-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <div>
                            <input type="radio" value="{{ $i }}" id="s1_{{ $i }}"
                                wire:model.live="score">
                            <label for="s1_{{ $i }}"
                                class="star-icon @if ($score >= $i) star-selected @endif"><i
                                    class="bi bi-star-fill"></i></label>
                        </div>
                    @endfor
                    {{-- <div>
                        <input type="radio" value="1" name="score" id="s1" wire:model.live="score">
                        <label for="s1"
                            class="star-icon @if ($score >= 1) star-selected @endif"><i
                                class="bi bi-star-fill"></i></label>
                    </div>
                    <div>
                        <input type="radio" value="2" name="score" id="s2" wire:model.live="score">
                        <label for="s2"
                            class="star-icon @if ($score >= 2) star-selected @endif"><i
                                class="bi bi-star-fill"></i></label>
                    </div>
                    <div>
                        <input type="radio" value="3" name="score" id="s3" wire:model.live="score">
                        <label for="s3"
                            class="star-icon @if ($score >= 3) star-selected @endif"><i
                                class="bi bi-star-fill"></i></label>
                    </div>
                    <div>
                        <input type="radio" value="4" name="score" id="s4" wire:model.live="score">
                        <label for="s4"
                            class="star-icon @if ($score >= 4) star-selected @endif"><i
                                class="bi bi-star-fill"></i></label>
                    </div>
                    <div>
                        <input type="radio" value="5" name="score" id="s5" wire:model.live="score">
                        <label for="s5"
                            class="star-icon @if ($score >= 5) star-selected @endif"><i
                                class="bi bi-star-fill"></i></label>
                    </div> --}}
                    <div class="p-1">
                        {{ $score }}
                    </div>



                </div>
                @error('score')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group mb-3">
                <div class="form-floating">
                    <textarea wire:model.defer="comment" class="form-control @error('comment') is-invalid @enderror"
                        placeholder="{{ __('Leave a comment here') }}" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">{{ __('Comment') }}</label>
                    @error('comment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-warning form-control" type="submit">{{ __('Submit') }}</button>
            </div>
            <small
                style="font-size:12px">{{ __('By submitting this feedback, you acknowledge it may be visible to the public.') }}</small>
        </form>
    </div>
</div>
