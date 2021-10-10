import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StockDataComponent } from './pages/stock-data/stock-data.component';
import { SubscribeComponent } from './pages/subscribe/subscribe.component';
import { ContactPageComponent } from './pages/contact-page/contact-page.component';
import { HomeComponent } from './pages/home/home.component';
import { CartComponent } from './pages/cart/cart.component';
import { ProductsComponent } from './pages/products/products.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'contact-page', component: ContactPageComponent },
  { path: 'collections', component: StockDataComponent },
  { path: 'cart', component: CartComponent },
  { path: 'subscribe', component: SubscribeComponent },
  { path: 'products', component: ProductsComponent },
  { path: '', redirectTo: '/home', pathMatch: 'full'},
  { path: '**', redirectTo: '/home', pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
