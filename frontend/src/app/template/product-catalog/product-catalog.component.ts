import { Component } from '@angular/core';
import { ProductsService } from 'src/app/services/services/products.service';

interface Category {
  id: number;
  category_gender: string;
  created_at: string;
  updated_at: string;
}

interface Product {
  id: number;
  product_name: string;
  category_id: number;
  product_price: number;
  image: string; // Adicionada a propriedade image para a URL da imagem
}

interface ImageCategoryMap {
  [categoryId: number]: string;
}

@Component({
  selector: 'app-product-catalog',
  templateUrl: './product-catalog.component.html',
  styleUrls: ['./product-catalog.component.css']
})
export class ProductCatalogComponent {
  categories: Category[] = [];
  products: Product[] = [];
  filteredProducts: Product[] = [];
  selectedCategoryId: number | null = null;
  imageCategoryMap: ImageCategoryMap = {
    29: '../../../assets/produts/friosLaticinios.jpg',
  
    // Adicione outras associações de ID da categoria para URL da imagem
  };

  constructor(private productService: ProductsService) {
    this.listCategories();
    this.getProducts();
  }

  listCategories() {
    this.productService.getCategories().subscribe((categories) => {
      this.categories = categories;
      console.log(this.categories);
    });
  }

  getProducts() {
    this.productService.getProducts().subscribe((products) => {
      this.products = products.map((product) => ({
        ...product,
        image: this.imageCategoryMap[product.category_id]
      }));
      console.log(this.products);
    });
  }

  filterProductsByCategory(categoryId: number) {
    this.selectedCategoryId = categoryId;
    this.filteredProducts = this.products.filter((product) => product.category_id === categoryId);
  }
}
