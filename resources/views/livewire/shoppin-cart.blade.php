<!-- resources/views/livewire/cart.blade.php -->

<div class="dropdown">
    <button class="btn dropdown-toggle btn-sm btn-cart" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa fa-shopping-cart text-dark fa-2x text-white" aria-hidden="true" style="cursor: pointer;"></i>
        <span class="badge bg-danger">{{ count($cartItems) }}</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuButton1">
        <div class="px-4 py-3">
            <h2>Your Cart</h2>
            <div class="cart-items ">
                @foreach ($cartItems as $item)
                    <div class="cart-item d-flex justify-content-between m-1" style="width: 300px;">
                        <p>{{ $quantities[$item->id] }}</p>
                        <p>Product: <span class="text-danger ">{{ $item->title }}</span></p>
                        <p>${{ $item->price }}</p>
                        <button wire:click="removeFromCart({{ $item->id }})"
                            class="bg-danger text-white border-0 p-2">Remove</button>
                    </div>
                @endforeach
            </div>
            <p>Total: ${{ $total }}</p>
            <button wire:click="emptyCart" class="dropdown-item mb-2 bg-danger text-white border-0 p-2 text-center">Empty
                Cart</button>
            <a href="{{ route('stripe.checkout',['$total','$cartItems']) }}" class="dropdown-item bg-danger text-white border-0 p-2 text-center">Check Out</a>
        </div>
    </ul>
</div>
