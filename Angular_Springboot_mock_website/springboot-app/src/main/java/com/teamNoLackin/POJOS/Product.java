package com.teamNoLackin.POJOS;

import org.springframework.data.annotation.Id;

import lombok.Data;
import lombok.Value;

@Data
public class Product {
	@Id
    private String productId;

    private String description;
    private String imgUrl;
    private Double price;
    
    public String getProductId() {
		return productId;
	}

	public void setProductId(String productId) {
		this.productId = productId;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getImgUrl() {
		return imgUrl;
	}

	public void setImgUrl(String imgUrl) {
		this.imgUrl = imgUrl;
	}

	public Double getPrice() {
		return price;
	}

	public void setPrice(Double price) {
		this.price = price;
	}

    public Product(){
    }
}
