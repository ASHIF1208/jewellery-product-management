#!/bin/bash

# Create directories if they don't exist
mkdir -p public/images/hero
mkdir -p public/images/categories
mkdir -p public/images/products

# Download hero image
curl -o public/images/hero/luxury-diamond-ring.jpg https://images.unsplash.com/photo-1605100804763-247f67b3557e?q=80&w=2000&auto=format&fit=crop

# Download category images
curl -o public/images/categories/diamond-rings.jpg https://images.unsplash.com/photo-1603561591411-07134e71a2a8?q=80&w=2000&auto=format&fit=crop
curl -o public/images/categories/luxury-necklaces.jpg https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?q=80&w=2000&auto=format&fit=crop
curl -o public/images/categories/elegant-earrings.jpg https://images.unsplash.com/photo-1630019852942-f89202989a59?q=80&w=2000&auto=format&fit=crop

# Download product images
curl -o public/images/products/diamond-ring-1.jpg https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?q=80&w=1000&auto=format&fit=crop
curl -o public/images/products/diamond-ring-2.jpg https://images.unsplash.com/photo-1603561591411-07134e71a2a8?q=80&w=1000&auto=format&fit=crop
curl -o public/images/products/diamond-necklace-1.jpg https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?q=80&w=1000&auto=format&fit=crop
curl -o public/images/products/diamond-earrings-1.jpg https://images.unsplash.com/photo-1630019852942-f89202989a59?q=80&w=1000&auto=format&fit=crop

# Set proper permissions
chmod 644 public/images/hero/*
chmod 644 public/images/categories/*
chmod 644 public/images/products/* 