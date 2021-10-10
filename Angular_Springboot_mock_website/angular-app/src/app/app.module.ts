import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StockDataComponent } from './pages/stock-data/stock-data.component';
import { FooterComponent } from './pages/footer/footer.component';
import { HeaderComponent } from './pages/header/header.component';
import { SubscribeComponent } from './pages/subscribe/subscribe.component';
import { HttpClientModule } from '@angular/common/http';
import { HttpClientService } from './services/http-client.service';
import { ContactPageComponent } from './pages/contact-page/contact-page.component';
import { HomeComponent } from './pages/home/home.component';
import { CartComponent } from './pages/cart/cart.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatTabsModule} from '@angular/material/tabs'; 
import {MatIconModule} from '@angular/material/icon';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatDialogModule} from '@angular/material/dialog';
import { ProductsComponent } from './pages/products/products.component';
import { SearchModalComponent } from './pages/search-modal/search-modal.component';
import { FormsModule, ReactiveFormsModule }   from '@angular/forms';
import { CarouselModule } from 'ngx-owl-carousel-o';
import { NavbarComponent } from './pages/navbar/navbar.component';
import { FeaturedCollectionComponent } from './pages/featured-collection/featured-collection.component';
import { CarouselComponent } from './pages/carousel/carousel.component';
import { ChallengeComponent } from './pages/challenge/challenge.component';
@NgModule({
  declarations: [
    AppComponent,
    StockDataComponent,
    FooterComponent,
    HeaderComponent,
    SubscribeComponent,
    ContactPageComponent,
    HomeComponent,
    CartComponent,
    ProductsComponent,
    SearchModalComponent,
    NavbarComponent,
    FeaturedCollectionComponent,
    CarouselComponent,
    ChallengeComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    BrowserAnimationsModule,
    MatToolbarModule,
    MatTabsModule,
    MatIconModule,
    MatDialogModule,
    MatFormFieldModule,
    FormsModule,
    ReactiveFormsModule,
    CarouselModule
  ],
  providers: [HttpClientService],
  bootstrap: [AppComponent],
  entryComponents: [SearchModalComponent]
})
export class AppModule { }
