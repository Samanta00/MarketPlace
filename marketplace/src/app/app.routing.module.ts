import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";
import { CartComponent } from "./template/cart/cart.component";
import { NavComponent } from "./template/nav/nav.component";
import { ProductCatalogComponent } from "./template/product-catalog/product-catalog.component";
import { SocalSalesComponent } from "./template/socal-sales/socal-sales.component";

const routes:Routes=[
    {path:'', component:NavComponent },
    {path:'catalog', component:ProductCatalogComponent},
    {path:'sales', component:SocalSalesComponent},
    {path:'list', component:CartComponent}
]

@NgModule({
    declarations:[],
    imports:[RouterModule.forRoot(routes)],
    exports:[RouterModule],
})

export class AppRoutingModule{};