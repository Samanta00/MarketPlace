import { Component } from '@angular/core';
import { ProductsService } from 'src/app/services/services/products.service';
import { Subject } from 'rxjs';
import { switchMap } from 'rxjs/operators';

//armazenamento para valores de produtos
interface Product {
  id: number;
  product_name: string;
  category_id: number;
  product_price: number;
  expiration_date: Date;
  stock_quantity: number;
  perishable_product: boolean;
  quantity?: number; 
}
//armazenamento para valores de categorias
interface Categories {
  id: number;
  category_gender: string;
  created_at: string;
  updated_at: string;
}
//armazenamento para agrupamento de produtos por categoria
interface GroupedProduct {
  category: string;
  products: Product[];
}
//armazenamento para a model de produto
interface ProductModel {
  id: number;
  product_name: string;
  category_id: number;
  product_price: number;
  expiration_date: Date;
  stock_quantity: number;
  perishable_product: boolean;
  selectedCategory?: number; 
}

//armazenamento para itens adicionados ao carrinho
interface CartItem {
  product: Product;
  quantity: number;
  totalPrice: number;
}



@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent {
  products: Product[] = [];
  cartItems: any[] = [];
  categories: Categories[] = [];
  filteredProducts: GroupedProduct[] = [];
  selectedCategory: number | null = null;
  filteredProductsEditForm: GroupedProduct[] = [];
  filteredProductsByCategory: GroupedProduct[] = [];
  cartItemQuantities: { [productId: number]: number } = {};

 //objeto com os valores para novos produtos
  newProduct: Product & { selectedProduct: string, selectedCategory: number | null, quantity: number } = {
    id: 0,
    product_name: '',
    category_id: 0,
    product_price: 0,
    expiration_date: new Date(),
    stock_quantity: 0,
    perishable_product: true,
    selectedProduct: '',
    selectedCategory: null,
    quantity: 0 
  };
  //objetos com os valores para editar os produtos
  editedProduct: ProductModel & { selectedProduct: string, selectedCategory?: number } = {
    id: 0,
    product_name: '',
    category_id: 0,
    product_price: 0,
    expiration_date: new Date(),
    stock_quantity: 0,
    perishable_product: true,
    selectedProduct: '',
  };
 
  showEditFormFlag: boolean = false;
  quantity: number = 0;
  totalPrice: number = 0;
  stockMessage: string = '';
  private refreshProducts$ = new Subject<void>(); // Subject para acionar a atualização dos produtos
  constructor(private productService: ProductsService) { }

  //inicializador que chama todas as funções
  ngOnInit() {
    this.refreshProducts$
      .pipe(
        switchMap(() => this.productService.getProducts())
      )
      .subscribe(
        (data: Product[]) => {
          this.products = data;
          this.selectedCategory = null;
          this.filterProductsByCategory();
          console.log(this.products);
        },
        (error) => {
          console.log(error);
        }
        
      );
  
    this.listProducts();
    this.listCartItems(); // Carregar os itens do carrinho
    this.selectedCategory = null;
    this.listCategories();
  }
//lista os produtos
  listProducts() {
    this.refreshProducts$.next(); // Aciona a atualização dos produtos
    this.filteredProducts = []; // Limpa a lista de produtos filtrados
  
    // Agrupa os produtos por categoria
    const groupedProducts: GroupedProduct[] = [];
  
    this.categories.forEach(category => {
      const products = this.products
        .filter(product => product.category_id === category.id);
  
      groupedProducts.push({ category: category.category_gender, products });
    });
  
    this.filteredProducts = groupedProducts;
  }
  
  
//adiciona novos produtos ao carrinho
  addProductToCart(event: any) {
    event.preventDefault();

    const selectedProductName = this.newProduct.selectedProduct;
    const selectedProduct = this.products.find(product => product.product_name === selectedProductName);
    
    if (!selectedProduct) return;
    if (this.newProduct.quantity > selectedProduct.stock_quantity) return console.log('Quantidade excede o estoque disponível');
    if (!this.newProduct.quantity || this.newProduct.quantity<0) {
      this.stockMessage = 'A quantidade precisa ser preenchida.';
      return;
    }
    this.cartItems.push(selectedProduct);
    const remainingStock = selectedProduct.stock_quantity - this.newProduct.quantity;
    this.stockMessage = `Estoque restante do produto ${selectedProduct.product_name}: ${remainingStock}`;
    
    this.productService.postCart(selectedProduct).subscribe(
      (response: Product) => {
        console.log('Produto criado com sucesso e adicionado ao carrinho', response);
        this.resetForm();
        this.refreshProducts$.next();
      },
      (error) => console.log(error)
    );

    this.addToCart();
  }
  
  
  private resetForm() {
    this.newProduct.product_name = '';
    this.newProduct.stock_quantity = 0;
    this.newProduct.product_price = 0;
  }


//edita os produtos
  editProduct() {
    if (this.editedProduct.id !== null && this.editedProduct.id !== undefined) {
      this.editedProduct.product_name = this.editedProduct.selectedProduct;
      this.editedProduct.category_id = this.editedProduct.selectedCategory !== undefined ? this.editedProduct.selectedCategory : 0;
  
      this.productService.editCart(this.editedProduct.id, this.editedProduct).subscribe(
        (response) => {
          console.log('produto atualizado com sucesso', response);
          this.showEditFormFlag = false; // Esconde o formulário de edição
          this.refreshProducts$.next(); // Aciona a atualização dos produtos
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      console.log('ID do produto não definido');
    }
  }

  
//remove os produtos de carrinho
removeItemFromCart(productId: number) {
  // Remova o item do servidor
  this.productService.deleteCart(productId).subscribe(
    () => {
      console.log('Produto removido com sucesso do carrinho');
      // Remova o item da lista local
      this.cartItems = this.cartItems.filter(item => item.id !== productId);
    },
    (error) => {
      console.log(error);
    }
  );
}
//adiciona ao carrinho
addToCart() {
  const selectedProduct = this.products.find(product => product.product_name === this.editedProduct.selectedProduct);
  if (selectedProduct) {
    if (this.newProduct.quantity > selectedProduct.stock_quantity) {
      alert('Quantidade selecionada excede o estoque disponível!');
      return;
    }
    console.log(selectedProduct.product_price)
    const itemPrice = selectedProduct.product_price * this.newProduct.quantity;

    console.log('selectedProduct:', selectedProduct);
    console.log('product_price:', selectedProduct.product_price);
    console.log('quantity:', this.newProduct.quantity);
    console.log('itemPrice:', itemPrice);

    const cartItem: CartItem = {
      product: selectedProduct,
      quantity: this.newProduct.quantity,
      totalPrice: itemPrice
    };

    this.cartItems.push(cartItem);
    this.totalPrice += itemPrice;
  }
}

//mostra o formulário de produtos adicionados ao carrinho
showEditForm(product: ProductModel) {
  this.editedProduct = { ...product, selectedProduct: product.product_name, selectedCategory: product.category_id };
  this.filterProductsByCategoryInEditForm();
  this.showEditFormFlag = true;
}

 //faz o listamento de categoria por nome
  getCategoryName(categoryId: number): string {
    const category = this.categories.find(cat => cat.id === categoryId);
    return category ? category.category_gender : '';
  }

//lista todos os nomes de categoria
  listCategories() {
    this.productService.getCategories().subscribe(
      (data: Categories[]) => {
        this.categories = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }
  //lista os itens do carrinho
  listCartItems() {
  this.productService.getCart().subscribe(
    (data: any[]) => {
      this.cartItems = data;
      console.log(data)
    },
    (error) => {
      console.log(error);
    }
  );
  }
 //filtra produtos por categoria
  filterProductsByCategory() {
    const categoryId = this.newProduct.category_id;
    const selectedCategoryId = this.editedProduct.selectedCategory;
  
    if (selectedCategoryId !== null && selectedCategoryId !== undefined) {
      // Filtro para o segundo formulário
      this.filteredProductsEditForm = this.categories
        .filter(category => category.id === selectedCategoryId)
        .map(category => {
          return {
            category: category.category_gender,
            products: this.products.filter(product => product.category_id === selectedCategoryId)
          };
        });
    } else {
      // Filtro para o primeiro formulário
      this.filteredProducts = this.categories
        .filter(category => category.id === categoryId)
        .map(category => {
          return {
            category: category.category_gender,
            products: this.products.filter(product => product.category_id === categoryId)
          };
        });
    }
  }
  
  //filtra os produtos por categoria no formulario de edição
  filterProductsByCategoryInEditForm() {
    const selectedCategoryId = this.editedProduct.selectedCategory;
    const selectedCategory = this.categories.find(category => category.id === selectedCategoryId);
  
    if (selectedCategory) {
      const filteredProducts = this.products.filter(product => product.category_id === selectedCategoryId);
      this.filteredProductsEditForm = [{ category: selectedCategory.category_gender, products: filteredProducts }];
    } else {
      this.filteredProductsEditForm = [];
    }
  }
  
  isCategorySelected(categoryId: number): boolean {
    return this.products.some(product => product.category_id === categoryId);
  }
  
isProductInCart(productName: string): boolean {
  // Implemente a lógica para verificar se o produto está no carrinho
  return this.cartItems.some(item => item.product_name === productName);
}
  
}