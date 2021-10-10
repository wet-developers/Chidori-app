package com.teamNoLackin.businessLogic;

import javax.annotation.PostConstruct;

import org.springframework.beans.factory.annotation.Autowired;

import com.teamNoLackin.POJOS.Product;
import com.teamNoLackin.repositories.ProductRegistry;

public class tableData {

	@Autowired
    private ProductRegistry productRepository;

    @PostConstruct
    private void init(){
        
        // productRepository.deleteAll();

        Product product=new Product();
        product.setImgUrl("kamsung.jpg");
        product.setPrice(12000.00);
        productRepository.save(product);

        product=new Product();
        product.setDescription("Lokia Pomia 10");
        product.setImgUrl("lokia.jpg");
        product.setPrice(9000.00);
        productRepository.save(product);
    }
}
